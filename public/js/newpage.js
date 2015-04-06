var addPageFromButton = function () {
	var $new_page;

/*

If the input of the ADD NEW PAGE field is not empty,
	add a new page button to the pageButtonContainer div
	add a new inactive page button to the mainContentContainer div

*/


	if("#newPageTextInput").val() !== "") {
		$new_page = $("<div>").text($("#newPageTextInput").val());
		
	}

}