import AuthService from '../services/auth.service';

const token = localStorage.getItem('token');
const initialState = { loggedIn: token ? true : false };

export const auth = {
  namespaced: true,
  state: initialState,
  actions: {
    login({ commit }, user) {
      return AuthService.login(user).then(user => {
        this.state.loggedIn = true;
        return Promise.resolve(user);
      }, error => {
        this.state.loggedIn = false;
        return Promise.reject(error);
      });
    },
    logout({ commit }) {
      AuthService.logout().then(user => {
        this.state.loggedIn = false;
        return Promise.resolve(user);
      });
    }
  }
};
