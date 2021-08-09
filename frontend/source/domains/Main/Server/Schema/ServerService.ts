import Rest from '@devitools/Services/Rest'
import { resource } from '../settings'

/**
 * @type { ServerService }
 */
export default class ServerService extends Rest {
  /**
   * @type {String}
   */
  resource = resource
}
