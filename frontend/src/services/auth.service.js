import axios from 'axios';
import api from '../utils/api';

class AuthService {
  login(user) {
    return api.post('/auth/login', { email: user.email, password: user.password }).then(response => {
      if (response.data.data.token) localStorage.setItem('token', response.data.data.token);
      return response.data;
    });
  }
  logout() {
    return api.get('/auth/logout').then(response => {
      if (response.data.success) localStorage.removeItem('token');
      return response.data;
    });
  }
}

export default new AuthService();
