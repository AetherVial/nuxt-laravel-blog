export const state = () => ({
  errors: {}
})

//create getters

export const getters = {
  errors(state) {
    return state.errors
  }
}

// create mutators

export const mutations = {
  SET_VALIDATION_ERRORS(state, errors) {
    state.errors = errors
  }
}

// create actions

export const actions = {
  setErrors({commit}, errors) {
    commit("SET_VALIDATION_ERRORS", errors)
  },
  clearErrors({commit}) {
    commit("SET_VALIDATION_ERRORS", {})
  }
}