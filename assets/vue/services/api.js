import axios from 'axios'

axios.defaults.baseURL = 'http://127.0.0.1:8000'

export const getAllServices = async () => {
  try {
    return await axios.get('/api/services')
  } catch (e) {
    throw e.response
  }
}
export const newService = async (json) => {
  try {
    return await axios.post('/api/services', json)
  } catch (e) {
    throw e.response
  }
}
export const formulaireContact = async (contact) => {
  try {
    return await axios.post('/api/contact', contact)
  } catch (e) {
    throw e.response
  }
}