<!-- Modal -->
<div class="modal fade" id="categoriaProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formCadastrocategoriaproduto" autocomplete="off" >
      <div class="modal-body">

          @csrf
        
          <div class="form-group">
            <label for="exampleInputEmail1">Nome da categoria</label>
            <input type="text" name="categoriaproduto" class="form-control" id="categoriaproduto" placeholder="Digite o nome da categoria" maxlength="30">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Ordem da categoria</label>
            <input type="number" name="ordemcategoriaproduto" class="form-control" id="ordemcategoriaproduto" >
          </div>
          
          <div style="display:none;" id="loading">
            <i class="fa fa-spinner fa-pulse fa-fw"></i> Aguarde...
            <span class="sr-only">Aguarde...</span>
          </div>

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
    </form>
  </div>
</div>