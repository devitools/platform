export { domain } from 'source/domains/Main/Project/settings'

/** @type {string} */
export const path = '/dashboard/main/project'

/** @type {string} */
export const icon = 'create_new_folder'

/** @type {function} */
export const table = () => import('resources/views/dashboard/main/project/ProjectTable.vue')

/** @type {function} */
export const form = () => import('resources/views/dashboard/main/project/ProjectForm.vue')
