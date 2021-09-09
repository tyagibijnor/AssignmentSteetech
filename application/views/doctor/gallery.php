<body>
    <center><h1 style="color:Red">Doctor Information</h1>
    <a href="<?php echo base_url();?>">Home</a>
   <div>
        <div style="width:360px;
                    height:100px;
                    background-color:#f5f5f0;
                    color:blue;
                    border-color: coral;
                    border-style: solid;
                    ">
    Welcome <?php echo ucfirst(strtolower(substr_replace($this->session->userdata('userName'),'....',6))); 
    if($this->session->userdata('roleid') == 1) { echo " (admin)";
        $roleid = $this->session->userdata('roleid');  ?>
    <p><a href="<?php echo base_url();?>user/addgallery">Add Gallery</a></p>
    <?php } ?>
    <p><h5><u><i><a href="<?php echo base_url();?>user/logout">Logout</a></i></u></h5></p>
   
        </div>
        <?php $msg=$this->session->flashdata('msg'); if(isset($msg)) { echo $msg; } ?>
 </div>
 
 </center>
<table id="navneet" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sn.</th>
                <th>Doctor Name</th>
                <th>Gallery</th>
                
            </tr>
        </thead>
        <tbody>
 <?php
  $i =0; 
   if(isset($doctor)) {
                foreach($doctor as $hdata) {
                    $i++; ?>
                    <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php 
                    $dname = $this->user_model->getdoctornamebyid($hdata->did); 
                    echo $dname->name; ?></td>
                    <td><img src="<?php echo base_url();?>uploads/<?php echo $hdata->imagepath ? $hdata->imagepath : "noimage.jpg"; ?>" 
      alt="Image missing" height="50" width="50" >  
                </td>
                 </tr>
                <?php }} ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Sn.</th>
                <th>Doctor Name</th>
                <th>Gallery</th>
                               
            </tr>
        </tfoot>
    </table>
    <script>
                 $(document).ready(function(){
                    $("#navneet").DataTable({ "sPaginationType": "full_numbers" });
                    });
                    

    </script>