import random
import timeit

def insertion_sort(list, func):
    for index, element in enumerate(list):
        value = index
        while value > 0:
            if func(element) < func(list[value-1]):
                list[value], list[value-1] = list[value-1], list[value]
                value -= 1
            else:
                break
    return list
                

def selection_sort(list, func):
    sorted_list = []

    while len(list) > 0:
        min =list[0]
        for element in list:
            if func(min) > func(element):
                min = element
            
        sorted_list.append(min)
        list.remove(min)
    return sorted_list


def quick_sort(list, func):
    less = []
    greater = []
    if len(list) <= 1:
        return list
    pivot = random.choice(list)
    
    for element in list:
        if func(element) < func(pivot):
            less.append(element)
        elif func(element) > func(pivot):
            greater.append(element)
    return quick_sort(less, func) + [pivot] + quick_sort(greater, func)


def bubble_sort(list, func):
    swapped = True
    while swapped:
        swapped = False

        for i in range(0, len(list)-1):
            if func(list[i]) > func(list[i+1]):
                list[i], list[i+1] = list[i+1], list[i]
                swapped = True
    return list
   
#n = []
#for t in range(10000):
#    n.append(random.random())

#[random.random() for i in range(1000)]

print insertion_sort([('e',3),('l',7),('o',10),('h',1),('l',6)], lambda e: e[1])
 

#t = timeit.Timer("bubble_sort([random.random() for i in range(1000)], lambda e: e)", "from __main__ import bubble_sort;import random")
#print "bubble sort:", t.timeit(100)
#t = timeit.Timer("quick_sort([random.random() for i in range(1000)], lambda e: e)", "from __main__ import quick_sort;import random")
#print "quick sort:",t.timeit(100)
#t = timeit.Timer("insertion_sort([random.random() for i in range(1000)], lambda e: e)", "from __main__ import insertion_sort;import random")
#print "insertion sort",t.timeit(100)
