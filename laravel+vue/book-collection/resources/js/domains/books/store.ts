import { Ref } from 'vue';
import { storeModuleFactory } from '../../services/store';

export interface Book{
    id: number ;
    title: string;
    summary: string;
    author_id: number;
}

export interface BooksRef extends Ref<Book[]>{}
export type BookUpdate = Partial<Omit<Book, 'id'>>;
export type NewBook = Omit<Book, 'id'>;

export const bookStore = storeModuleFactory<Book>('books')



