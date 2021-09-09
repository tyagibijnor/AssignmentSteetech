<html>
    <head>
        <title>
            <?php if(isset($title)) { echo $title;}?>
        </title>
    </head>
    <body>
        <div style="width:100%;height:100%">
    <div style="width:100%;height:5%;color:blueviolet"> 
        <center><h2>  <?php if(isset($title)) { echo $title;}?></h2></center>

</div>
<div style="width:100%;height:20%;background-color:#b3ffff;color:#003300">
        <form action="<?php echo base_url();?>user/galleryadd" enctype='multipart/form-data' method="post">
        <br>
      
         <table>
              <tr><td><b>Doctor Name</b></td>
                 <td>
                   <select name='did'>
                   <?php foreach( $doctorlist as $ddata) 
                   { ?>
                   <option value="<?php echo $ddata->id;?>"><?php echo $ddata->name;?></option>
                    <?php } ?>
                   </select>
                    </td>
                </tr><tr>
                <td><b>Upload Image</b></td>
                <td><input type="file" name="newimagepath" class="form-control span12"></td>
                </tr>
            </table><br>
            <input type="submit" name="add" value="Upload">
            
        </form>
    </div>
    <div style="width:100%;height:5%;color:blueviolet"> 
            <center><h2>Steetech Administrator</h2></center>
    </div>
    </div>
    
    </body>
    
</html>