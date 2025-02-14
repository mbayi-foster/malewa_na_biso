// src/services/ApiService.js
import axios from 'axios';

class Users {
  constructor(baseURL) {
    this.api = axios.create({
      baseURL: baseURL,
      headers: {
        'Content-Type': 'application/json',
      },
    });
  }

  async getAll(resource) {
    try {
      const response = await this.api.get(resource);
      return response.data;
      console.log("la reponse est ", response)
    } catch (error) {
      this.handleError(error);
    }
  }

  async store(resource, data) {
    try {
      const response = await this.api.post(resource, data);
      return response.data;
    } catch (error) {
      this.handleError(error);
    }
  }

  async put(resource, data) {
    try {
      const response = await this.api.put(resource, data);
      return response.data;
    } catch (error) {
      this.handleError(error);
    }
  }

  async delete(resource) {
    try {
      const response = await this.api.delete(resource);
      return response.data;
    } catch (error) {
      this.handleError(error);
    }
  }

  handleError(error) {
    // Gérez les erreurs ici
    console.error('API Error:', error);
    throw error; // Re-throw l'erreur pour pouvoir la gérer dans le composant
  }
}

export default new Users('http://localhost:8000/api'); // Remplacez par votre URL de base