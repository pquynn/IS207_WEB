  let Display = '0';
  let Result = '0';
        
        function clearDisplay() {
            Display = '0';
            Result = '0';
            document.getElementById('display').value = "0";
            document.getElementById('result').value = "0";
        }

        function ScreenDisplay(value) {
            if (Display === '0' && !isNaN(value)) {
                Display = value;
            } else {
                Display += value;
            }
            document.getElementById('display').value = Display;
        }

        function Delete() {
            if (Display.length > 1) {
                Display = Display.slice(0, -1);
            } else {
                Display = '0';
            }
            document.getElementById('display').value = Display;
        }

        function CalculateResult() {
            try {
                let result = eval(Display);
                document.getElementById('result').value = result;
            } catch (error) {
                document.getElementById('result').value = 'Error!';
            }
        }
