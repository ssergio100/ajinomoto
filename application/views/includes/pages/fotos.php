<div class="row"><br><br>
        <input type="file" id="btn_file"  style="display:none" onchange="encodeImageFileAsURL(this)" />
        <div class="imagens" id="imagens">
        </div>
        <div class="fixed-action-btn ">
            <a class="btn-floating waves-effect waves-light btn-large blue" onclick="callFile()">
              <i class="large material-icons">mode_edit</i>
            </a>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('resources/js/fotos/scripts.js');?>"></script>