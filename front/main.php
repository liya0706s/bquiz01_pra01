	<!-- 中間區塊開始 -->
	<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">

	    <?php include "marquee.php"; ?>

	    <div style="height:32px; display:block;"></div>
	    <!--正中央-->

	    <div style="width:100%; padding:2px; height:290px;">
	        <div id="mwww" loop="true" style="width:100%; height:100%;">
	            <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
	        </div>
	    </div>

	    <!-- 把原本放在比較前面的javascript程式碼搬到輪播區的後面 -->
	    <script>
	        var lin = new Array();

	        <?php
            // 取得所有啟用的輪播圖片
            $lins = $Mvim->all(['sh' => 1]);
            foreach ($lins as $lin) {
                // 要把陣列轉成字串寫在js上，將圖片路徑存入陣列
                echo "lin.push('{$lin['img']}');";
            }
            ?>

	        var now = 0;
            ww();  // 先執行一次，避免一開始沒有圖片顯示

            // 如果陣列中有超過一張以上的動畫圖片就會開始輪播
	        if (lin.length > 1) {
                // 建立一個固定時間會循環執行的計時器
                // 每隔三秒會執行一次ww()這個函式
	            setInterval("ww()", 3000);

                // 把now改成1, 因為前面ww()執行時index為0的圖片已經顯示過了
                // 三秒後要顯示的應該是index為1的圖片
	            now = 1;
	        }
			
			// 建立ww()函式
	        function ww() {

				// 在畫面上id為mww的元件中要寫入一串html內容
				// 這一串html內容中最重要的是取得陣列lin中的指定位置的動畫圖片路徑
	            $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
	            //$("#mwww").attr("src",lin[now])

				// 執行完上述程式後把now的值加一
	            now++;

				// 判斷now的值有沒有超過陣列lin的長度
				// 如果超過陣列長度，則把now重置為0
	            if (now >= lin.length)
	                now = 0;
	        }
	    </script>

	    <div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
	        <span class="t botli">最新消息區
	        </span>
	        <ul class="ssaa" style="list-style-type:decimal;">
	        </ul>
	        <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
	        </div>
	        <script>
	            $(".ssaa li").hover(
	                function() {
	                    $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
	                    $("#altt").show()
	                }
	            )
	            $(".ssaa li").mouseout(
	                function() {
	                    $("#altt").hide()
	                }
	            )
	        </script>
	    </div>
	</div>
	<!-- 中間區塊結束 -->