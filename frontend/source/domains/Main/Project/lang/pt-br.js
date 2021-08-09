import { routes } from 'resources/lang/pt-br/helper'
import parent from 'resources/lang/pt-br/menu/main'

const plural = 'Projetos'
const singular = 'Projeto'

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
  type: {
    label: 'Tipo'
  },
  deployments: {
    label: 'Servidores'
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
