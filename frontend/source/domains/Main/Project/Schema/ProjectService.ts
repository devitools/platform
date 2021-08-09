import Rest from '@devitools/Services/Rest'
import { resource } from '../settings'

/**
 * @type { ProjectService }
 */
export default class ProjectService extends Rest {
  /**
   * @type {String}
   */
  resource = resource
}
