#! /usr/bin/env python
# -*- coding: utf-8 -*-

import urllib
import urllib2
import cookielib
import re
import time

class NoRedirectHandler(urllib2.HTTPRedirectHandler):     
    def http_error_302(self, req, fp, code, msg, headers):
        infourl = urllib.addinfourl(fp, headers, req.get_full_url())
        infourl.status = code
        infourl.code = code
        return infourl

def fetch_thing(url, params, method, headers):
    params = urllib.urlencode(params)
    req = urllib2.Request(url + '?' + params)
    for keys in headers:
        req.add_header(keys, headers[keys])
    opener = urllib2.build_opener(NoRedirectHandler())
    f = opener.open(req)
    return (f.code, f.headers.dict, f.read())

def domain_status(domain):
    url = 'https://www.iis.se/wordpress/wp-content/themes/iis2012/engine_whois01.php'
    params = {'lang' : 'se', 'q' : domain}
    headers = {}
    content = fetch_thing(url, params, 'GET', headers)
    #print content

    url = 'https://www.iis.se/wordpress/wp-content/themes/iis2012/iframe_whois02.php'
    params = {}
    headers = {'Cookie' : content[1]['set-cookie']}
    content = fetch_thing(url, params, 'GET', headers)
    #print content

    soon_release = re.search(r"Datum för frisläppande</td>\n\t\t<td>(.+)</td>", content[2])
    if content[0] == 200 and content[1]['content-length'] == '0':
        return 'ledig'
    elif soon_release:
        return soon_release.groups()[0]
    else:
        return 'upptagen'

s = 'abcdefghijklmnopqrstuvwxyz'
for i, c in enumerate(s):
    for i, c2 in enumerate(s):
        for i, c3 in enumerate(s):
            name = c + c2 + c3
            status = domain_status(name)
            if status != 'upptagen':
                if status == 'ledig':
                    print name
                else:
                    print name + ' - ' + status
        time.sleep(1)
    print c + '-----------------------------'
    time.sleep(10)
print 'done'
