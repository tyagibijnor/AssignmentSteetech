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
        <form action="<?php echo base_url();?>user/updatedoctor" method="post">
        <input type="hidden" name="id" value="<?php echo $doctor->id; ?>">
            <br>
            <table>
                <tr>
                    <td>
                    <b>Name</b>
                    </td>
                    <td>
                    <input type = 'text' name='name' value="<?php echo $doctor->name; ?>" required>            
                    </td>
                </tr>
                <tr>
                    <td>
                    <b>Address</b>
                    </td>
                    <td>
                    <input type = 'text' name='address' value="<?php echo $doctor->address; ?>" required>            
                    </td>
                </tr>
                
            </table><br>
            <input type="submit" name="update" value="Update">
            
        </form>
    </div>
    <div style="width:100%;height:5%;color:blueviolet"> 
            <center><h2>Steetech Administrator</h2></center>
    </div>
    </div>
    
    </body>
    
</html>