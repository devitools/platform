export { domain } from 'source/domains/Main/Server/settings'

/** @type {string} */
export const path = '/dashboard/main/server'

/** @type {string} */
export const icon = 'dns'

/** @type {function} */
export const table = () => import('resources/views/dashboard/main/server/ServerTable.vue')

/** @type {function} */
export const form = () => import('resources/views/dashboard/main/server/ServerForm.vue')
