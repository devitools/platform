import Schema from '@devitools/Agnostic/Schema'

import Service from './ProjectService'
import { domain } from '../settings'
import DeploymentSchema from 'app/source/domains/Main/Project/Deployment/Schema/DeploymentSchema'
/**
 * @class { ProjectSchema }
 */
export default class ProjectSchema extends Schema {
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

    this.addField('type')
      .fieldIsInputPlan()
      .fieldTableShow()
      .fieldTableWhere()
      .fieldFormWidth(100)
      .validationRequired()

    this.addField('deployments')
      .fieldIsArray(DeploymentSchema.provideArray(), true)
  }
}
