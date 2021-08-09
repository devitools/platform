// add children
import * as project from 'resources/views/dashboard/main/project'
import * as server from 'resources/views/dashboard/main/server'

/**
* @param {AppRouterGroup} $router
*/
export default ($router) => {
  $router.provide(server)
  $router.provide(project)
}
