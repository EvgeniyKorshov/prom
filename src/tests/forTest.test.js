import { render } from '@testing-library/react';

describe('forTest render test',()=>{
    it('snapshot test', () => {
        const component = render(<forTest/>);
        expect(component).toMatchSnapshot();
        });
})