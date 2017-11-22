<html>
   
   <head>
      <title>登录示例表单</title>
   </head>

   <body>
      
      @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      
      <?php
         echo Form::open(array('url'=>'/validation'));
      ?>
      
      <table border = '1'>
         <tr>
            <td align = 'center' colspan = '2'>登录示例</td>
         </tr>
         
         <tr>
            <td>用户名：</td>
            <td><?php echo Form::text('username'); ?></td>
         </tr>
         
         <tr>
            <td>密码：</td>
            <td><?php echo Form::password('password'); ?></td>
         </tr>
         
         <tr>
            <td align = 'center' colspan = '2'>
               <?php echo Form::submit('登陆'); ?  ></td>
         </tr>
      </table>
      
      <?php
         echo Form::close();
      ?>   
   </body>
</html> 
