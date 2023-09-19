<!-- Modal -->
<div class="modal fade" id="editarVariacaoproduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Variação de Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formEditarvariacaoproduto" autocomplete="off" >
      <div class="modal-body">

          @csrf

         

          <div class="form-group">
            <label for="editar_titulo">Título</label>
            <input type="text" name="editar_titulo" class="form-control" id="editar_titulo" placeholder="Digite o título do complemento" maxlength="30">
          </div>

          <hr>


          <div class="form-group">
            <label for="editar_descricaoprodvariavel">Descrição ( Irá aparecer quando complemento )</label>
            <textarea id="editar_descricaoprodvariavel" class="form-control" rows="5" name="editar_descricaoprodvariavel"></textarea>
          </div>

          <hr> 
          
          
          <div style="display:none;" id="loading">
            <i class="fa fa-spinner fa-pulse fa-fw"></i> Aguarde...
            <span class="sr-only">Aguarde...</span>
          </div>

        

      </div>
      <div class="modal-footer">
        <button id="btn_editarfecharvariacaoproduto" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="btn_editarsalvarvariacaoproduto" type="submit" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
    </form>
  </div>
</div>