<link rel="stylesheet" href="./css/style.css">
<script src="./libs/jquery-1.8.1.js"></script>
<script src="./js/interactive.js"></script>
<script type="text/javascript">
    function Symbol(){
        elements = [
            "водород",
            "гелий",
            "литий",
            "бериллий",
            "бор",
            "углерод",
            "азот",
            "кислород",
            "фтор",
            "неон",
            "натрий",
            "магний",
            "алюминий",
            "кремний",
            "фосфор",
            "сера",
            "хлор",
            "аргон",
            "калий",
            "кальций",
            "скандий",
            "титан",
            "ванадий",
            "хром",
            "марганец",
            "железо",
            "кобальт",
            "никель"
        ];
        function getRandom(min, max){
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        function render(){
            jQuery('#visionTd').empty();
            random = getRandom(0, (elements.length) - 1);
            jQuery('#visionTd').append((random + 1) + ' ' + elements[random]);
        }
        return {
            init: function(){
                setInterval(render, 1000);
            }
        }
    }
    symbol = Symbol();
    symbol.init();
</script>
<div id="visionDiv">
    <table id="visionTable">
        <tr>
            <td id="visionTd">
                Start
            </td>
        </tr>
    </table>
</div>