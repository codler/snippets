/*
Name: yap-goodies
Author: Han Lin Yap
Description: Collection of useful functions
Version: 0.2 (2010-11-19)

Index:
	input_int - (req jquery)
	switch_display - (req jquery)
 */
 
//
function input_int(event) {
	var k = event.which;
	var value = $(this).val();
	
	// Key arrow up
	if (event.keyCode == 38) {
		value++;
		$(this).val(value);
		return false;
	// Key arrow down
	} else if (event.keyCode == 40) {
		value--;
		$(this).val(value);
		return false;
	}
	
	// Key enter
	if (k == 13) {
		$(this).trigger('blur');
	}
	
	// key 0-9
	if ((k >= 32 && k <= 47) || 
		(k >= 58 && k <= 95) || 
		(k >= 106 && k <= 126) || 
		k > 127) {
		// Key arrow left and right
		if (event.keyCode != 37 && event.keyCode != 39) {
		event.preventDefault();
		}
	}
}

// parameter - jquery object
function switch_display(el1,el2) {
	if (el1.is(":visible")) {
		el1.hide();
		el2.show();
	} else {
		el2.hide();
		el1.show();
	}
}