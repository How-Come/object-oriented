window.onload = function(){
  imgArr = ['./img/01.jpg','./img/02.jpg','./img/03.jpg','./img/04.jpg','./img/05.jpg','./img/06.jpg','./img/07.jpg','./img/08.jpg','./img/09.jpg','./img/10.jpg','./img/11.jpg','./img/12.jpg'];  

      //判断当前年份是否是闰年(闰年2月份有29天，平年2月份只有28天)
      function isLeap(year) {
        return year % 4 == 0 ? (year % 100 != 0 ? 1 : (year % 400 == 0 ? 1 : 0)) : 0;
      }

      var Y = document.getElementById('Year').value;    //获取输入的年份
      var P = document.getElementsByClassName('head-img');
      var M = document.getElementsByClassName('head-month');
      var F = document.getElementsByClassName('head-form');



      var i, j,k;
      function clearClass(){
        var dd = document.getElementsByTagName('td');
        var len = dd.length;
        for(var i=0; i<len; i++){
          dd[i].className = '';
        }
      }
      function changcolor(){
       var dd = document.getElementsByTagName('td');
       var len = dd.length;
       for(i=0; i<len; i++){
        dd[i].onclick = function(){
          clearClass();
          this.className = 'current';

          alert(Y+'年'+'月'+this.innerHTML+'日');

        }
      }
    }

    function changeYear(y) {

      var s='';
      for (var i = 11; i >= 0; i--) {
        
         firstday = new Date(y, i, 1), //获取当月的第一天  月份：m==i+1
         dayOfWeek = firstday.getDay(),   //判断第一天是星期几(返回[0-6]中的一个，0代表星期天，1代表星期一，以此类推)
         days_per_month = new Array(31, 28 + isLeap(y), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31),         //创建月份数组
         str_nums = Math.ceil((dayOfWeek + days_per_month[i]) / 7);                        //确定日期表格所需的行数
         var adres= imgArr[i];        
         P[i].src = adres;
         M[i].innerHTML = "<p style='text-align:left; padding-left:30px;font-size:22px;'><b>"+(i+1)+"</b></p>"; //显示月份
         s = "<tr><th><b>SU</b></th><th><b>MO</b></th><th><b>TU</b></th><th><b>WE</b></th><th><b>TH</b></th><th><b>FR</b></th><th><b>SA</b></th></tr>"; //打印表格第一行(显示星期)
         
         for (j = 0; j < str_nums; j ++) {         //二维数组创建日期表格
          s += '<tr>';       
          for (k = 0; k < 7; k++) {
              var idx = 7 * j + k;                //为每个表格创建索引,从0开始
              var date = idx - dayOfWeek + 1;          //将当月的1号与星期进行匹配
              (date <= 0 || date > days_per_month[i]) ? (date = ' '): (date = idx - dayOfWeek + 1);  
              // 索引小于等于0或者大于月份最大值就用空表格代替

              s += '<td>' + date + '</td>';  //高亮显示当

            }
            s += '</tr>';
          }
          F[i].innerHTML = s;
        }
      }
      changeYear(Y);
      changcolor();
      var slider =
      Swipe(document.getElementById('slider'), {
        auto: 30000,
        continuous: true,
        callback: function(pos) {
          var i = bullets.length;
          while(i--){
            bullets[i].className = ' ';
          }
          bullets[pos].className = 'on';
        }
      });
      var bullets = document.getElementById('position').getElementsByTagName('li');

    }