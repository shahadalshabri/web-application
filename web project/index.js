
function editSendJSON(){
  /* var handleFileSelect = function(evt) {

      var files = evt.target.files;
      var file = files[0];
      if (files && file) {
          var reader = new FileReader();

          reader.onload = function(readerEvt) {
              var binaryString = readerEvt.target.result;
              var book_cover = btoa(binaryString);
          };

          reader.readAsBinaryString(file);
      }
  };*/

			let result = document.querySelector('.result');
      let course_id = document.querySelector('#course_id');
			let name = document.querySelector('#name');
			let field = document.querySelector('#field');
      let description = document.querySelector('#description');



			// Creating a XHR object
			let xhr = new XMLHttpRequest();
			let url = "edit.php";

			// open a connection
			xhr.open("POST", url, true);

			// Set the request header i.e. which type of content you are sending
			xhr.setRequestHeader("Content-Type", "application/json");

			// Create a state change callback
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4 && xhr.status === 200) {

					// Print received data from server
					result.innerHTML = this.responseText;

				}
			};//,"description": description.value, "img": img.value

			// Converting JSON data to string
			var data = JSON.stringify({ "name": name.value, "field": field.value, "description": description.value, "course_id": course_id.value});

			// Sending data with the request
			xhr.send(data);
    //  alert();

		}
