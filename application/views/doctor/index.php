<body>
    <center><h1 style="color:Red">Doctor Information</h1>
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
    <p><a href="<?php echo base_url();?>user/showgallery/<?php echo $roleid;?>">Show Gallery</a></p>
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
                <th>Name</th>
                <th>Address</th>
                <?php if($this->session->userdata('roleid') == 1) { ?>
                <th>Action</th>
                <?php } ?>
                
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
                    <td><?php echo $hdata->name; ?></td>
                    <td><?php echo $hdata->address; ?></td>
          
          <?php if($this->session->userdata('roleid') == 1) { ?>
          <td>
          <a href="<?php echo base_url();?>user/editdoctor/<?php echo $hdata->id;?>"><i class='fas fa-edit'></i></a>
          |
          <a onclick="return confirm('Are you sure want to delete this record ?');" 
          href="<?php echo base_url();?>user/deletedoctor/<?php echo $hdata->id;?>" 
          role="button" data-toggle="modal">
          <i class='fas fa-cut'></i></a>
          <?php } ?>
          </td> 
                 </tr>
                <?php }} ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Sn.</th>
                <th>Name</th>
                <th>Address</th>
                <?php if($this->session->userdata('roleid') == 1) { ?>
                <th>Action</th>
                <?php } ?>
                
            </tr>
        </tfoot>
    </table>
    <script>
                 $(document).ready(function(){
                    $("#navneet").DataTable({ "sPaginationType": "full_numbers" });
                    });
                    

    </script>