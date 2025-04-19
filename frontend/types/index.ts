
export interface Group {
    id?: number;
    name: string;
}

export interface User {
    id?: number;
    username: string;
    password: string;
    group_id: number;
    group?: Group;
}
