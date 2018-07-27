<html>
    <head>
           <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
          <script src="<?php echo base_url('assets/js/validacoes.js'); ?>"></script>
    </head>
    
    <body>
        
        <input type="text" id="apiCpf" name="cpf" placeholder="cpf">
        <input type="text" id="apiSenha" name="senha" placeholder="senha">
        <input type="text" id="apiEvento" name="idEvento" placeholder="id evento">
            <button  onclick="enviarLoginApi();">Enviar</button>
   
    </body>
</html>