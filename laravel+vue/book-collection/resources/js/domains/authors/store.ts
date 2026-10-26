import { Ref } from 'vue';
import { storeModuleFactory } from '../../services/store';

export interface Author{
    id: number;
    name: string;
}

export interface AuthorsRef extends Ref<Author[]>{}
export type NewAuthor = Omit<Author, 'id'>;
export type AuthorUpdate = Partial<Omit<Author, 'id'>>;

export const authorStore = storeModuleFactory<Author>('authors')