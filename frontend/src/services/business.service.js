import api from '../utils/api';

class BusinessService {
  list() {
    return api.get('/business').then(response => {
      return response.data;
    });
  }
  detail(id) {
    return api.get('/business/' + id).then(response => {
      return response.data;
    });
  }
}

export default new BusinessService();
