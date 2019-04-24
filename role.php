<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
  <title>名侦探柯南</title>
  <link rel="stylesheet" href="themes/theme.min.css" />
  <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
  <link rel="stylesheet" href="themes/jquery.mobile.structure-1.4.5.min.css" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div data-role="page">
    <div data-role="header" data-position="fixed" >
    <a href="index.html" data-role="button" data-icon="home" data-iconpos="notext"></a>
    <a href="role/role_add.php" data-role="button" data-icon="plus" data-iconpos="notext"></a>
    <h1>角色介绍</h1>
      </div>
      <div data-role="content">   
        <ul data-role="listview">
     <ul data-role="listview" data-filter="true" data-filter-placeholder="请输入角色名字" >
     <?php
     //引用数据库：补充完整
      require_once("common/dbtools.inc.php");  
      
      //指定每页显示几条记录
      $records_per_page = 10;

      //建立数据连接
      $link = create_connection();
      
      //执行 SQL 指令:补充完整
      $sql = "SELECT * FROM role ORDER BY id";  //DESC降序，默认是升序
      $result = execute_sql($link, "mingzhentan", $sql);

      //显示记录
      $j = 1;
      while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
      {
        echo "<a href='role/role_all.php?id=";
    echo $row["id"]."'><li><img src='image/head/" .$row["id"]. ".png'><h3>" .$row["name"]. "</h3><p>" .$row["introd"]. "</p></a></li>";
        $j++;
      }
      //释放内存空间
      mysqli_free_result($result);
    //
      mysqli_close($link);
    ?>
      </ul> 
      </ul> 
    </div> 
    <div data-role="footer" data-position="fixed">
      <h4>&copy;榕外影城</h4>
    </div>
    </div>
  </body>
</html>
