import { computed, Ref } from "vue";
import { storeModuleFactory } from "../../services/store";
import { getRequest } from "../../services/http";

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

const baseReviewStore = storeModuleFactory<Review>('reviews')

export const reviewStore =  {
    setters: {...baseReviewStore.setters},
    getters: {...baseReviewStore.getters,
        getByBookId: (bookId: number) => computed (() => 
            Object.values(baseReviewStore.getters.all.value)
            .filter(review => review.book_id === bookId))
    },
    actions: {...baseReviewStore.actions,
        fetchByBookId: async (bookId: number) => {
            const {data} = await getRequest('reviews');
            if (!data) return;
            baseReviewStore.setters.setAll(data);
        }
    }
}

