export { domain } from 'source/domains/Main/Project/Deployment/settings'

/** @type {string} */
export const path = '/dashboard/main/project/deployment'

/** @type {string} */
export const icon = '-'

/** @type {function} */
export const table = () => import('resources/views/dashboard/main/project/deployment/DeploymentTable.vue')

/** @type {function} */
export const form = () => import('resources/views/dashboard/main/project/deployment/DeploymentForm.vue')
