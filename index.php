
<html>
<head>
    <title>Генерація форм</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        let formArr = [];
        function createForm () {
            $.ajax({
                type: "POST",
                url: "./src/createForm.php",
                data: {form: formArr},
                success: function (result) {
                    let outputDiv = $('#output');
                    outputDiv.empty();
                    outputDiv.text(result);
                }
            });
        }

        function addToForm() {
            let elementData = {};
            elementData.element = $('#element').val();
            elementData.id = $('#elementId').val();
            elementData.Name = $('#elementName').val();
            elementData.optionArr = [];
            if ($('#element').val() == 'select') {
                let i = 0;
                while ($("*").is('#optionValue' + i)) {
                    let elementOption = {};
                    elementOption.value = document.getElementById('optionValue' + i).value;
                    elementOption.optionName = document.getElementById('optionName' + i).value;
                    elementData.optionArr.push(elementOption);
                    i++;
                }
            }
            if($('#element').val() == 'select') {
                var num = 0;
                while(document.getElementById("optionValue"+num)) {
                    document.getElementById('addingOption'+num).remove();
                    num++;
                }
            }
            formArr.push(elementData);
            updateOutput();
            console.log(formArr);
            $('#element').val("text");
            $('#elementId').val("");
            $('#elementName').val("");
        }

        function checkElement(val){
            console.log(val);
            if(val == 'select'){
                var position = document.getElementById("pos");
                position.insertAdjacentHTML('afterend', "<div id = 'addingOption0'><p>Option value:</p><input type = 'text' id = 'optionValue0'><p>Option name:</p><input type = 'text' id = 'optionName0'><button id = 'addOpt0' onclick='addOption()'>Add option</button></div>");
            }
            else {
                var num = 0;
                while(document.getElementById("optionValue"+num)) {
                    document.getElementById('addingOption'+num).remove();
                    num++;
                }
            }
        }

        function addOption(){
            var num = 0;
            while(document.getElementById("optionValue"+num)) {
                num++;
            }
            num--;
            var position = document.getElementById("addingOption"+num);
            num++;
            position.insertAdjacentHTML('afterend', "<div id = 'addingOption"+num+"'><p>Option value:</p><input type = 'text' id = 'optionValue"+num+"'><p>Option name:</p><input type = 'text' id = 'optionName"+num+"'><button id = 'addOpt"+num+"' onclick='addOption()'>Add option</button></div>");
        }

        function updateOutput() {
            let outputDiv = $('#output');
            outputDiv.empty();
            let outputString = '';
            for (let i = 0; i < formArr.length; i++) {
                if(i < (formArr.length - 1)) {
                    outputString += formArr[i]['element'] + '=>';
                }
                else{
                    outputString += formArr[i]['element'];
                }
            }
            outputDiv.text(outputString);
        }
    </script>
</head>
<body>
<p>Element:</p>
<select id = "element" onchange="checkElement(this.value)">
    <option value = "checkbox">input(Checkbox)</option>
    <option value = "radiobutton">input(Radiobutton)</option>
    <option value = "text">input(Text)</option>
    <option value = "button">Button</option>
    <option value = "select">Select</option>
</select>
<input type = "text" id = "pos" value = "1" hidden>
<p>Element id:</p>
<input type = "text" id = "elementId">
<p>Element name:</p>
<input type = "text" id = "elementName">
<button id = "addToArr" onclick = "addToForm()">Add element to form</button>
<br>
<button id = "addToArr" onclick = "createForm()">Create form</button>
<p>- - - - - - - - - - -</p>
<div id="output"></div>
</body>
</html>