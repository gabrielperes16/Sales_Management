from flask import Blueprint, render_template, request,jsonify,abort
from database.cliente import INFO_CLIENTE
from datetime import datetime

cliente_route = Blueprint('cliente', __name__)


@cliente_route.route('/')
def lista_clientes():
    """ listar os clientes """
    return render_template('lista_clientes.html', clientes=INFO_CLIENTE)
    

@cliente_route.route('/', methods=['POST'])
def inserir_cliente():
    """ inserir os dados do cliente """
    
    data = request.json
    for cliente in INFO_CLIENTE:
        dia=datetime.now
    
    novo_usuario = {
        "id": len(INFO_CLIENTE) + 1,
        "nome": data['nome'],
        "telefone": data['telefone'],
        "quantidade": data['quantidade'],
        "dia": data['dia'],
}
    
    INFO_CLIENTE.append(novo_usuario)
    
    return render_template('item_cliente.html', cliente=novo_usuario)
    

@cliente_route.route('/new')
def form_cliente():
    """ formulario para cadastrar um cliente """
    return render_template('form_cliente.html')
    



@cliente_route.route('/<int:cliente_id>/edit')
def form_edit_cliente(cliente_id):
    """ formulario para editar um cliente """
    cliente = None
    for c in INFO_CLIENTE:
        if c['id'] == cliente_id:
            cliente = c
    
    return render_template('form_cliente.html', cliente=cliente)

@cliente_route.route('/<int:cliente_id>/update', methods=['PUT'])
def atualizar_cliente(cliente_id):
    """ atualizar informacoes do cliente """
    cliente_editado = None
    # obter dados do formulario de edicao
    data = request.json
    
    # obter usuario pelo id
    for c in INFO_CLIENTE:
        if c['id'] == cliente_id:
            c['nome'] = data['nome']
            c['telefone'] = data['telefone']
            c['dia'] = data['dia']
            c['quantidade'] = data['quantidade']
            cliente_editado = c

    return render_template('item_cliente.html', cliente=cliente_editado)

@cliente_route.route('/<int:cliente_id>')

def detalhe_cliente(cliente_id):
    for cliente in INFO_CLIENTE:
        if cliente["id"] == cliente_id:
            try:
                quantidade = int(cliente["quantidade"])  # Converte a quantidade para float
                calculo = quantidade * 7
                resultado = f' <strong>{quantidade} X 7 = {calculo:.2f}</strong>'
                contexto = f'O Cliente <strong>{cliente["nome"]}</strong> Comprou <strong>{cliente["quantidade"]}</strong> Garrafas'
                return f'{contexto}{resultado}'
            except ValueError:
                abort(400, description="Quantidade inválida")  # Retorna erro 400 se a conversão falhar
    
    abort(404)  # Retorna erro 404 se o cliente não for encontrado


@cliente_route.route('/<int:cliente_id>/delete', methods=['DELETE'])
def deletar_cliente(cliente_id):   
    global INFO_CLIENTE
    INFO_CLIENTE = [ c for c in INFO_CLIENTE if c['id'] != cliente_id ]
    return {'deleted': 'ok'}

def registros(cliente_id):
    pass