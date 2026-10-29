import { Ref } from "vue";
import { storeModuleFactory } from "../../services/store";

export interface Review{
    id: number;
    score: number;
    body: string;
    book_id: number;
    username: string;
}

export interface ReviewsRef extends Ref<Review[]>{}
export type ReviewUpdate = Partial<Omit<Review, 'id'>>;
export type NewReview = Omit<Review, 'id'>;

export const reviewStore = (id: number) => {return storeModuleFactory<Review>(`/books/${id}/reviews`)}


