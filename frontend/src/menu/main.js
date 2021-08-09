import { action } from '@devitools/Security/actions'
export { domain, icon } from 'resources/views/dashboard/main'

// add children
import * as project from 'resources/views/dashboard/main/project'
import * as server from 'resources/views/dashboard/main/server'

/** @type {*[]} */
export const children = [
  action(server),
  action(project)
]
