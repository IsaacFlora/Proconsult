<!-- Modal -->
<div class="modal fade" id="novaVariacaoproduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar Variação de Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formCadastrovariacaoproduto" autocomplete="off" >
      <div class="modal-body">

          @csrf

         

          <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Digite o título do complemento" maxlength="30">
          </div>

          <hr>


          <div class="form-group">
            <label for="descricaoprodvariavel">Descrição ( Irá aparecer quando complemento )</label>
            <textarea class="form-control" rows="5" name="descricaoprodvariavel"></textarea>
          </div>

          <hr>
      
          
          
          
          <div style="display:none;" id="loading">
            <i class="fa fa-spinner fa-pulse fa-fw"></i> Aguarde...
            <span class="sr-only">Aguarde...</span>
          </div>




        

      </div>
      <div class="modal-footer">
        <button id="btn_fecharvariacaoproduto" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="btn_salvarvariacaoproduto" type="submit" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
    </form>
  </div>
</div>