import { domain } from '../settings'
import ServerSchema from 'app/source/domains/Main/Server/Schema/ServerSchema'
import SchemaArray from 'app/@devitools/Agnostic/SchemaArray'

/**
 * @class { DeploymentSchema }
 */
export default class DeploymentSchema extends SchemaArray {
  /**
   * @type {string}
   */
  static domain = domain

  /**
   */
  construct () {
    this.addField('server')
      .fieldIsSelectRemote(ServerSchema.provideRemote())
  }
}
