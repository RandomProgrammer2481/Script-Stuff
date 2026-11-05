import { getRequest, postRequest } from "../../services/http"
import { reactive, computed } from 'vue'


export interface Auth {
    'email' : string,
    'password' : string,
}
