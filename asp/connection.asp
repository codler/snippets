<% dim con, rs 
' Connection
' Replace datebasename
Set con = Server.CreateObject("ADODB.Connection")
con.open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source="&Server.MapPath("data/databasename.mdb")
' RecSet
Set rs = Server.CreateObject("ADODB.RecordSet")
%>