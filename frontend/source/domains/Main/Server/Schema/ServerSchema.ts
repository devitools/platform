import Schema from '@devitools/Agnostic/Schema'

import Service from './ServerService'
import { domain } from '../settings'

/**
 * @class { ServerSchema }
 */
export default class ServerSchema extends Schema {
  /**
   * @type {string}
   */
  static domain = domain

  /**
   * @type {Http}
   */
  service = Service

  /**
   */
  construct () {
    this.addField('name')
      .fieldIsInputPlan()
      .fieldTableShow()
      .fieldTableWhere()
      .fieldFormAutofocus()
      .fieldFormWidth(100)
      .fieldFormFill('name')
      .validationRequired()

    this.addField('ip')
      .fieldTableShow()
      .fieldTableWhere()
      .fieldFormWidth(100)
      .validationRequired()
      .fieldAsMasked('###.###.###.###')

    this.addField('user')
      .fieldFormWidth(100)
      .validationRequired()

    this.addField('key')
      .fieldFormWidth(100)
      .validationRequired()
  }
}
