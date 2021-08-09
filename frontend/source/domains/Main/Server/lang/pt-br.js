import { routes } from 'resources/lang/pt-br/helper'
import parent from 'resources/lang/pt-br/menu/main'

const plural = 'Servidores'
const singular = 'Servidor'

export const print = {
  title: `Imprimir ${singular}`
}

/*
export const groups = {
  main: {
    requiredIf: 'Dados Principais'
  }
}
*/

export const fields = {
  name: {
    label: 'Nome',
    tooltip: 'ex.: Nome usado para representar o registro',
    placeholder: 'ex: Digite um nome bem legal'
  },
  ip: {
    label: 'Endereço IP',
    tooltip: 'ex.: 192.168.1.25',
    placeholder: 'ex: Digite o endereço IP'
  },
  user: {
    label: 'Usuário',
    placeholder: 'ex: Digite o usuário'
  },
  key: {
    label: 'Chave de acesso',
    placeholder: 'ex: Digite a chave'
  }
}

/*
export const validations = {
  name: {
    requiredIf: 'ex.: Nome é obrigatório'
  }
}
*/

export default {
  routes: routes(parent, plural, singular),
  // groups,
  fields,
  // validations
  print
}
