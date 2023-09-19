<!-- Modal -->
<div class="modal fade" id="editarGrupocomplemento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Grupo de complemento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formEditargrupocomplemento" autocomplete="off" >
      <div class="modal-body">

          @csrf

          <input type="hidden" id="editar_jasoncomplementos" name="editar_complementos" value="">


          <div class="form-group">
            <label for="editar_titulocomplemento">Título</label>
            <input type="text" name="editar_titulocomplemento" class="form-control" id="editar_titulocomplemento" placeholder="Digite o título do complemento" maxlength="30">
          </div>

          <hr>

          <p><label for="editar_obrigatoriocomplemento">Obrigatoriedade</label></p>

          <div class="form-check form-check-inline">
            <input checked class="form-check-input" type="radio" name="editar_obrigatoriocomplemento" id="editar_obrigatoriocomplemento1" value="0">
            <label class="form-check-label" for="inlineRadio1">Opcional</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="editar_obrigatoriocomplemento" id="obrigatoriocomplemento2" value="1">
            <label class="form-check-label" for="inlineRadio2">Obrigatório</label>
          </div>

          <hr>

          <div class="form-group row">

            <div class="col-md-2">
              <label for="editar_minimocomplemento">Mínimo</label>
              <input disabled="" value="0" type="number" name="editar_minimocomplemento" class="form-control" id="editar_minimocomplemento">
            </div>

            <div class="col-md-2">
              <label for="editar_maximocomplemento">Máximo</label>
              <input type="number" name="editar_maximocomplemento" class="form-control" id="editar_maximocomplemento">
            </div>
            
          </div>

          <hr>

          <p>Complemento</p>

          <div id="editar_complementos">

            

            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-info float-right mb-2">Adicionar novo complemento</button>
              </div>
            </div>

           
            
          </div>
          
          
          
          <div style="display:none;" id="loading">
            <i class="fa fa-spinner fa-pulse fa-fw"></i> Aguarde...
            <span class="sr-only">Aguarde...</span>
          </div>




        

      </div>
      <div class="modal-footer">
        <button id="btn_editarfechargcomplementos" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="btn_editarsalvargcomplementos" type="submit" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
    </form>
  </div>
</div>