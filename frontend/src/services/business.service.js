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
  delete(id) {
    return api.delete('/business/' + id).then(response => {
      return response.data;
    });
  }
  update(id, data) {
    return api.post('/business/' + id, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    }).then(response => {
      return response.data;
    });
  }
  locales() {
    return api.get('/locales').then(response => {
      return response.data;
    });
  }
}

export default new BusinessService();
