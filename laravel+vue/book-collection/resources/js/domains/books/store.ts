import { ref, computed, ComputedRef, Ref } from 'vue';
import { deleteRequest, getRequest, postRequest, putRequest } from '../../services/http';
import { storeModuleFactory } from '../../services/store';

export interface Book{
    id: any;
    title: string;
    summary: string;
    author_id: any;
}

export interface BooksRef extends Ref<Book[]>{}
export type BookUpdate = Partial<Omit<Book, 'id'>>;
export type NewBook = Omit<Book, 'id'>;

export const bookStore = storeModuleFactory<Book>('books')


