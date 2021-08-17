<template>
  <div
    class="AuthSignUp flex row"
    :class="{ started }"
  >
    <div
      class="AuthSignUp__left shadow-3 col-xs-12 col-sm-12 col-md-5 col-lg-4"
    >
      <div class="AuthSignUp__left__header">
        <img
          alt="logo"
          class="AuthSignUp__logo"
          :src="$static('/logo/horizontal-300x120.png')"
        >
      </div>

      <div class="text-h6 text-center text-grey-default q-mb-lg">
        {{ $lang("pages.auth.signUp.title") }}
      </div>

      <form
        class="AuthSignUp__left__form"
        @submit.prevent="attempt"
      >
        <div class="row">

          <div class="col-12 q-pa-sm">
            <QInput
              v-model="record.name"

              :placeholder="$lang('pages.auth.signUp.name')"
              outlined
              :error="$v.record.name.$error"
              :error-message="$lang('pages.auth.signUp.error')"
              @input="status = true"
            >
              <!-- <template #prepend>
                                <QIcon name="person" />
                            </template> -->
            </QInput>
          </div>

          <div class="col-12 q-pa-sm">
            <QInput
              v-model="record.email"

              :placeholder="$lang('pages.auth.signUp.email')"
              outlined
              :error="$v.record.email.$error"
              :error-message="$lang('pages.auth.signUp.error')"
              @input="status = true"
            >
              <!-- <template #prepend>
                                <QIcon name="person" />
                            </template> -->
            </QInput>
          </div>

          <div class="col-12 q-pa-sm">
            <QInput
              v-model="record.password"

              :placeholder="$lang('pages.auth.signUp.password')"
              :type="isPassword ? 'password' : 'text'"
              outlined
              :error="$v.record.password.$error"
              :error-message="$lang('pages.auth.signUp.error')"
              @input="status = true"
            >
              <!-- <template #prepend>
                                <QIcon
                                    :name="record.password ? 'vpn_key' : 'lock'"
                                />
                            </template> -->

              <template #append>
                <QIcon
                  :name="
                    isPassword
                      ? 'visibility_off'
                      : 'visibility'
                  "
                  class="cursor-pointer"
                  @click="isPassword = !isPassword"
                />
              </template>
            </QInput>
          </div>

          <div class="col-12 q-pa-sm">
            <QInput
              v-model="record.passwordConfirm"

              :placeholder="$lang('pages.auth.signUp.passwordConfirm')"
              :type="isPasswordConfirm ? 'password' : 'text'"
              outlined
              :error="$v.record.passwordConfirm.$error"
              :error-message="$lang('pages.auth.signUp.wrongPassword')"
              @input="status = true"
              :rules="[val => !!(val === record.password) || $lang('pages.auth.signUp.wrongPassword')]"
            >

              <template #append>
                <QIcon
                  :name="
                    isPasswordConfirm
                      ? 'visibility_off'
                      : 'visibility'
                  "
                  class="cursor-pointer"
                  @click="isPasswordConfirm = !isPasswordConfirm"
                />
              </template>
            </QInput>
          </div>

        </div>

        <hr light>

        <template v-if="siteKey">
          <div
            class="AuthSignUp__recaptcha flex justify-center q-pt-xs q-pb-sm"
            :class="{
              'AuthSignUp__recaptcha--invalid animation-shake':
                $v.record.recaptcha.$error,
            }"
          >
            <vue-recaptcha
              ref="recaptcha"
              :sitekey="siteKey"
              :load-recaptcha-script="true"
              @verify="onVerify"
              @expired="onExpired"
            />
          </div>
          <p
            v-if="$v.record.recaptcha.$error"
            class="text-center text-red"
          >
            {{ $lang("pages.auth.signUp.errorRecaptcha") }}
          </p>
        </template>

        <div class="q-pa-sm">
          <QBtn
            class="AuthSignUp__button full-width"
            color="primary"
            size="md"
            :label="$lang('pages.auth.signUp.button')"
            type="submit"
            :loading="loading"
          />
        </div>
      </form>
    </div>
  </div>
</template>

<script type="text/javascript">
import VueRecaptcha from 'vue-recaptcha'
import { QBtn, QIcon, QInput, openURL } from 'quasar'
import { required } from 'vuelidate/lib/validators'
import $emporium from '@devitools/emporium'
import AuthAttempt from 'source/modules/Auth/AuthAttempt'
import { dashboard } from 'routes/dashboard'
export default {
  /**
     */
  name: 'AuthSignUp',
  /**
     */
  components: {
    VueRecaptcha,
    QInput,
    QIcon,
    QBtn
  },
  /**
     */
  mixins: [AuthAttempt],
  /**
     */
  data: () => ({
    started: false,
    isPassword: true,
    isPasswordConfirm: true,
    record: {
      email: '',
      password: '',
      passwordConfirm: '',
      name: '',
      recaptcha: ''
    },
    siteKey: process.env.VUE_APP_RECAPTCHA_SITEKEY
  }),
  /**
     */
  validations () {
    const valid = () => this.status === true
    const record = {
      name: {
        required,
        valid
      },
      email: {
        required,
        valid
      },
      password: {
        required,
        valid
      },
      passwordConfirm: {
        required,
        valid
      },
      recaptcha: {}
    }
    if (process.env.NODE_ENV === 'production') {
      record.recaptcha = { required }
    }
    return { record }
  },
  watch: {
    record: {
      deep: true,
      handler () {
        $emporium.commit('updateModified', true)
      }
    }
  },
  /**
     */
  mounted () {
    window.setTimeout(() => {
      this.started = true
    }, 1000)
  },
  /**
     */
  destroyed () {
    if (this.timeout || this.captchaTimeout) {
      window.clearTimeout(this.timeout)
      window.clearTimeout(this.captchaTimeout)
    }
  },
  /**
     */
  methods: {
    /**
         */
    openURL: openURL,
    /**
         */
    attemptFail () {
      this.$message.warning(this.$lang('pages.auth.signUp.error'))
    },
    /**
         */
    attempting () {
      return this.$service.signUp(this.record)
    },
    /**
         * @param {Object} response
         */
    attemptSuccess ({ data }) {
      this.$store
        .dispatch('auth/login', data.token)
        .then(() => $emporium.commit('updateModified', false))
        .then(this.openDashboard)
    },
    /**
         */
    attemptError (error) {
      this.attemptFail()
      const captcha = this.$util.get(error, 'response.data.data.captcha')
      if (captcha === 'invalid') {
        this.onExpired()
        this.$v.$touch()
        this.$refs.recaptcha.reset()
        return
      }
      this.status = false
    },
    /**
         */
    openDashboard () {
      // show the loading that will be deactivated by DashboardLayout
      this.$q.loading.show()
      let target = this.$route.query.toForbidden
      if (!target) {
        target = this.$route.query.fromForbidden
      }
      if (!target) {
        target = dashboard
      }
      this.$browse(target)
    },
    /**
         * @param {{email: string, password: string, password: recaptcha|number}} credentials
         */
    SignUpFromClipboard (credentials) {
      if (
        !credentials.email ||
                !credentials.password ||
                !credentials.recaptcha
      ) {
        return
      }
      this.record.email = credentials.email
      this.record.password = credentials.password
      this.record.recaptcha = credentials.recaptcha
      this.attempt()
    },
    /**
         * @param {string} response
         */
    onVerify (response) {
      const THIRTY_SECONDS = 30 * 1000
      this.record.recaptcha = response
      this.captchaTimeout = window.setTimeout(() => {
        try {
          this.onExpired()
          this.$v.$touch()
          this.$refs.recaptcha.reset()
        } catch (e) {
          // silent is gold
        }
      }, THIRTY_SECONDS)
    },
    /**
         */
    onExpired () {
      this.record.recaptcha = ''
    }
  }
}
</script>

<style lang="scss">
// $
.AuthSignUp {
    height: 100vh;
    overflow-x: hidden;
    opacity: 0.3;
    transition: opacity 0.5s;
    &.started {
        opacity: 1;
    }
    > .AuthSignUp__left {
        padding: 0 30px;
        background-color: #ffffff;
        min-width: 320px;
        min-height: 568px;
        overflow: auto;
        > .AuthSignUp__left__header {
            padding: 2.5vh 3vw 5vh 3vw;
            display: flex;
            justify-content: center;
        }
        .AuthSignUp__logo {
            max-height: 150px;
            max-width: 100%;
            user-select: none;
        }
    }
    .AuthSignUp__recaptcha {
        height: 100px;
        border: 1px solid transparent;
        &.AuthSignUp__recaptcha--invalid > div > div > div > iframe {
            border: 1px solid #c10015;
            border-radius: 3px;
            box-shadow: 0 0 8px 2px rgba(193, 0, 21, 0.4);
        }
    }
    .AuthSignUp__button {
        min-height: 42px;
    }
    @media (min-height: 600px) {
        .AuthSignUp__left__header {
            margin: calc((98vh - 600px) / 2) 0 0 0;
        }
    }
    @media (max-width: 600px) {
        .AuthSignUp__left {
            padding: 0 10px;
            .AuthSignUp__left__header {
                padding: 10px;
                > img {
                    max-height: 80px;
                }
            }
            > .text-h6.q-mb-lg {
                margin-bottom: 0;
            }
        }
    }
}
</style>
