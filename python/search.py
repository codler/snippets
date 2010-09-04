# linear search
def linear_search(search_list, key, func):
    for word in search_list:
        if key == func(word):
            print word
            
# tertiar search
def tertiar_search(search_list, key, func):
    if len(search_list)==1:
        if func(search_list[0]) == key:
            return search_list[0]
        else:
            return None

    if (func(get_left_slice2(search_list)[-1])>= key and func(get_left_slice2(search_list)[0]) <= key):

        return binary_search(get_left_slice2(search_list),key,func)
    elif (func(get_right_slice2(search_list)[0])<= key and func(get_right_slice2(search_list)[-1])>= key):
        return binary_search(get_right_slice2(search_list),key,func)
    elif (func(get_middle_slice2(search_list)[0])<= key and func(get_middle_slice2(search_list)[-1])>= key):
        return binary_search(get_middle_slice2(search_list),key,func)

def slice_in_three(list):
    length = len(list)//3
    return list[:length],list[length:length*2],list[length:]

def get_left_slice2(list):
    return slice_in_three(list)[0]

def get_middle_slice2(list):
    return slice_in_three(list)[1]

def get_right_slice2(list):
    return slice_in_three(list)[2]

# binary search
def binary_search(search_list, key, func):
    if len(search_list)==1:
        if func(search_list[0]) == key:
            return search_list[0]
        else:
            return None

    if (func(get_left_slice(search_list)[-1])>= key and func(get_left_slice(search_list)[0]) <= key):

        return binary_search(get_left_slice(search_list),key,func)
    elif (func(get_right_slice(search_list)[0])<= key and func(get_right_slice(search_list)[-1])>= key):
        return binary_search(get_right_slice(search_list),key,func)

def slice_in_two(list):
    length = len(list)
    return list[:length//2],list[length//2:]

def get_left_slice(list):
    return slice_in_two(list)[0]

def get_right_slice(list):
    return slice_in_two(list)[1]

# example usage
print tertiar_search([(1,'a'),(2,'b'),(4,'d'),(9,'f'), (10,'g'), (11,'k')], 4, lambda e: e[0])
