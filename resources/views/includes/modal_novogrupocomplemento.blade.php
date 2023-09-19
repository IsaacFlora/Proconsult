<!-- Modal -->
<div class="modal fade" id="novoGrupocomplemento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar Grupo complemento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formCadastrogrupocomplemento" autocomplete="off" >
      <div class="modal-body">

          @csrf

          <input type="hidden" id="jasoncomplementos" name="complementos" value="">


          <div class="form-group">
            <label for="titulocomplemento">Título</label>
            <input type="text" name="titulocomplemento" class="form-control" id="titulocomplemento" placeholder="Digite o título do complemento" maxlength="30">
          </div>

          <hr>

          <p><label for="obrigatoriocomplemento">Obrigatoriedade</label></p>

          <div class="form-check form-check-inline">
            <input checked class="form-check-input" type="radio" name="obrigatoriocomplemento" id="obrigatoriocomplemento1" value="0">
            <label class="form-check-label" for="inlineRadio1">Opcional</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="obrigatoriocomplemento" id="obrigatoriocomplemento2" value="1">
            <label class="form-check-label" for="inlineRadio2">Obrigatório</label>
          </div>



          <hr>

          <div class="form-group row">

            <div class="col-md-2">
              <label for="minimocomplemento">Mínimo</label>
              <input disabled="" value="0" type="number" name="minimocomplemento" class="form-control" id="minimocomplemento">
            </div>

            <div class="col-md-2">
              <label for="maximocomplemento">Máximo</label>
              <input type="number" name="maximocomplemento" class="form-control" id="maximocomplemento">
            </div>
            
          </div>

          <hr>

          <p><label for="valormaior">Usar valor maior ( Sabores de pizza por exemplo )</label></p>
          <p class="text-info">Ao usar a opção de "valor maior", o usuário poderá escolher mais de uma opção mas o valor das opções não será somado, o sistema irá usar o maior valor dos complementos. Utilizado por exemplo em sabores de pizza meio a meio onde o valor varia de acordo com o recheio.</p>

          <div class="form-check form-check-inline">
            <input checked class="form-check-input" type="radio" name="valormaior" id="valormaior1" value="0">
            <label class="form-check-label" for="valormaior1">Não usar</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="valormaior" id="valormaior2" value="1">
            <label class="form-check-label" for="valormaior2">Usar</label>
          </div>

          <hr>

          <p>Complemento</p>

          <div id="complementos">

            

            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-info float-right mb-2">Adicionar novo complemento</button>
              </div>
            </div>

            <div class="row produtoscomplementocontainer">
              <div class="col-md-8">
                <select class="form-control produtoscomplemento mb-1">
                  <option value="" selected>Escolha...</option>
                </select>
              </div>

              <div class="col-md-3">
                <input placeholder="Valor" data-thousands="." data-decimal="," value="" type="text" class="form-control valorprodutoscomplemento dinheiro">
              </div>

              <div class="col-md-1">
                <a class="produtoscomplementoremove" href="#"><i style="font-size: 20px; margin-top: 8px;" class="fas fa-trash"></i></a>
              </div>
            </div>
            
            
          </div>
          
          
          
          <div style="display:none;" id="loading">
            <i class="fa fa-spinner fa-pulse fa-fw"></i> Aguarde...
            <span class="sr-only">Aguarde...</span>
          </div>




        

      </div>
      <div class="modal-footer">
        <button id="btn_fechargcomplementos" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="btn_salvargcomplementos" type="submit" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
    </form>
  </div>
</div>